<?php
namespace Webbamboo\MaterialDashboard\Generator;

use Symfony\Bundle\MakerBundle\Generator as OriginalGenerator;
use Symfony\Bundle\MakerBundle\FileManager;
use Symfony\Bundle\MakerBundle\GeneratorTwigHelper;
use Symfony\Bundle\MakerBundle\Str;

class Generator extends OriginalGenerator
{
    private $fileManager;
    private $twigHelper;
    private $pendingOperations = [];
    private $namespacePrefix;

    public function __construct(FileManager $fileManager, string $namespacePrefix){
        parent::__construct($fileManager, $namespacePrefix);

        $this->fileManager = $fileManager;
        $this->twigHelper = new GeneratorTwigHelper($fileManager);
        $this->namespacePrefix = trim($namespacePrefix, '\\');
    }

    private function addOperation(string $targetPath, string $templateName, array $variables)
    {
        if ($this->fileManager->fileExists($targetPath)) {
            throw new RuntimeCommandException(sprintf(
                'The file "%s" can\'t be generated because it already exists.',
                $this->fileManager->relativizePath($targetPath)
            ));
        }

        $variables['relative_path'] = $this->fileManager->relativizePath($targetPath);

        $templatePath = $templateName;
        if (!file_exists($templatePath)) {
            $templatePath = __DIR__.'/../Resources/skeleton/'.$templateName;
            if (!file_exists($templatePath)) {
                throw new \Exception(sprintf('Cannot find template "%s"', $templateName));
            }
        }

        $this->pendingOperations[$targetPath] = [
            'template' => $templatePath,
            'variables' => $variables,
        ];
    }

    /**
     * Generate a normal file from a template.
     *
     * @param string $targetPath
     * @param string $templateName
     * @param array  $variables
     */
    public function generateFile(string $targetPath, string $templateName, array $variables)
    {
        $variables = array_merge($variables, [
            'helper' => $this->twigHelper,
        ]);

        $this->addOperation($targetPath, $templateName, $variables);
    }

    /**
     * Actually writes and file changes that are pending.
     */
    public function writeChanges()
    {
        foreach ($this->pendingOperations as $targetPath => $templateData) {
            if (isset($templateData['contents'])) {
                $this->fileManager->dumpFile($targetPath, $templateData['contents']);

                continue;
            }

            $this->fileManager->dumpFile(
                $targetPath,
                $this->getFileContentsForPendingOperation($targetPath, $templateData)
            );
        }
    }

    public function getFileContentsForPendingOperation(string $targetPath): string
    {
        if (!isset($this->pendingOperations[$targetPath])) {
            throw new RuntimeCommandException(sprintf('File "%s" is not in the Generator\'s pending operations', $targetPath));
        }

        $templatePath = $this->pendingOperations[$targetPath]['template'];
        $parameters = $this->pendingOperations[$targetPath]['variables'];

        $templateParameters = array_merge($parameters, [
            'relative_path' => $this->fileManager->relativizePath($targetPath),
        ]);

        return $this->fileManager->parseTemplate($templatePath, $templateParameters);
    }

    /**
     * Generate a new file for a class from a template.
     *
     * @param string $className    The fully-qualified class name
     * @param string $templateName Template name in Resources/skeleton to use
     * @param array  $variables    Array of variables to pass to the template
     *
     * @return string The path where the file will be created
     *
     * @throws \Exception
     */
    public function generateClass(string $className, string $templateName, array $variables = []): string
    {
        $targetPath = $this->fileManager->getRelativePathForFutureClass($className);

        if (null === $targetPath) {
            throw new \LogicException(sprintf('Could not determine where to locate the new class "%s", maybe try with a full namespace like "\\My\\Full\\Namespace\\%s"', $className, Str::getShortClassName($className)));
        }

        $variables = array_merge($variables, [
            'class_name' => Str::getShortClassName($className),
            'namespace' => Str::getNamespace($className),
        ]);

        $this->addOperation($targetPath, $templateName, $variables);

        return $targetPath;
    }
}
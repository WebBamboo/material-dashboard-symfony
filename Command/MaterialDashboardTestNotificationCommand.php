<?php

namespace Webbamboo\MaterialDashboard\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Notification;

class MaterialDashboardTestNotificationCommand extends Command
{
    private $em;
    protected static $defaultName = 'material-dashboard:test-notification';

    public function __construct(?string $name = null, EntityManagerInterface $em)
    {
        parent::__construct($name);

        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('A command to send a test notification to a user from the list')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $users = $this->em->getRepository(User::class)->findAll();
        $userChoices = [];
        foreach($users as $user)
        {
            $userChoices[] = $user->getEmail();
        }
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Please select which user you want to send a notification to',
            $userChoices
        );
        $question->setMultiselect(false);

        $user = $helper->ask($input, $output, $question);
        $selectedUser = $this->em->getRepository(User::class)->findOneByEmail($user);
        $notification = new Notification();
        $notification->setUser($selectedUser);
        $notification->setCreated(new \DateTime('now'));
        $notification->setDescription("Dummy data notification");
        $this->em->persist($notification);
        $this->em->flush();
    }

    return Command::SUCCESS;
}

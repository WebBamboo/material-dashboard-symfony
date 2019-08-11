---
title: Building a simple notifications system
---

A simple notifications system is bundled with this code, you can easily modify it if needed or implement your own. In order to make use of it you have to go through a few steps:
1. Create the Notification Entity. IMPORTANT Note that this system assumes your user entity is App\Entity\User adjust if needed:
```
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Webbamboo\MaterialDashboard\Model\NotificationInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification implements NotificationInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="notifications")
     */
    private $user;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $data = [];

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
```

2. Once that is done update your database running:
```
php bin/console doctrine:schema:update --force
```

3.  Open config/packages/doctrine.yaml and add the following:
```
doctrine:
				...
				orm:
								...
								resolve_target_entities:
												Webbamboo\MaterialDashboard\Model\NotificationInterface: App\Entity\Notification
```

4. Once the configuration is done you can clear the cache and run the following command to test the notification system:
```
php bin/console cache:clear
php bin/console material-dashboard:test-notification
```

Now the user you've chosen in the command wizard will get the notification in their dashboard. Usually the notifications appear within 15 seconds without refresh.
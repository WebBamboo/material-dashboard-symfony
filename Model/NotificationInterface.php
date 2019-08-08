<?php
namespace Webbamboo\MaterialDashboard\Model;

interface NotificationInterface
{
    public function getUser();
    public function getData();
    public function getDescription();
    public function getCreated();
}
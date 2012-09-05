<?php

namespace Webomage\MessageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MsgForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email');
    }

    public function getName()
    {
        return 'name';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return 'email';
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}

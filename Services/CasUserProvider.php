<?php

namespace L3\Bundle\CasUserBundle\Services;

use L3\Bundle\CasUserBundle\Entity\CasUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class CasUserProvider implements UserProviderInterface {

    public function __construct() {}

    public function loadUserByUsername($username) {
        $user = new CasUser();
        $user->setId($username);
        $roles = Array();
        if ($username === '__NO_USER__') {
            $roles = array('ROLE_ANON');
        } else {
            $roles = array('ROLE_ANON', 'ROLE_USER');
        }
        $user->updateRoles($roles);
        return $user;
    }

    public function refreshUser(UserInterface $user) {
        if(!$user instanceof CasUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getId());
    }

    public function supportsClass($class) {
        return CasUser::class === $class;
    }
} 

<?php
// Real location : AppBundle\Security
namespace AppBundle\Security\Voters; // <- Here the namespace is wrong.

use Symfony\Component\Security\Core\Authorization\Voter\AbstractVoter;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminMembersVoter extends AbstractVoter
{
    const ADMIN_MEMBER_EDIT = 'admin_member_edit';

    protected function getSupportedAttributes()
    {
        return array(ADMIN_MEMBER_EDIT);
    }

    protected function getSupportedClasses()
    {
        return array('AppBundle\Entity\Members');
    }

    protected function isGranted($attribute,$member,$user=null)
    {
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch($attribute) {
            case self::ADMIN_MEMBER_EDIT:
                if($user === $member){return false;}
                $rolesMember = $member->getRoles();
                $rolesUser = $user->getRoles();
                if(in_array('ROLE_SUPER_ADMIN',$rolesMember)){return false;}
                if(in_array('ROLE_ADMIN',$rolesMember) && !in_array('ROLE_SUPER_ADMIN',$rolesUser)){return false;}
                if(in_array('ROLE_ADMIN',$rolesUser)){return true;}

                break;
        }

        return false;
    }
}

<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

class DeelnameRepository extends \Doctrine\ORM\EntityRepository
{
    public function getBeschikbareDeelnames($userid)
    {

        $em=$this->getEntityManager();
        $member = $em->getRepository(User::class)->findOneBy(['id' => $userid]);
        $query=$em->createQuery("SELECT l FROM AppBundle:les l WHERE NOT EXISTS (SELECT IDENTITY(d.les) FROM AppBundle:deelname d WHERE d.user=:user AND d.les=l)");

        $query->setParameter('user', $member);
        return $query->getResult();
    }

    public function getIngeschrevenDeelnames($userid)
    {

        $em=$this->getEntityManager();
        $query=$em->createQuery("SELECT a FROM AppBundle:Deelname a WHERE :userid = a.user");

        $query->setParameter('userid',$userid);
        return $query->getResult();
    }
}

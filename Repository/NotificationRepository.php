<?php


namespace BrandcodeNL\NotificationBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NotificationRepository extends EntityRepository
{

    public function findNotifications($user, $read)
    {
        $notifications = $this->createQueryBuilder("n");

        $notifications
            ->leftJoin("n.notificationLink", 'l')
            ->andWhere("l.readStatus = :read")
            ->andWhere("l.user = :userId")
            ->andWhere("n.startDate < :date")
            ->setParameter("date", new \DateTime())
            ->setParameter("userId", $user->getId())
            ->setParameter("read", $read)
            ->orderBy('n.startDate', 'DESC')
        ;
        if ($read) {
            $notifications->setMaxResults(10);
        }        
        return $notifications->getQuery()->getResult();
    }

}
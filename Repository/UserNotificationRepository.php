<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserNotificationRepository extends EntityRepository
{

    public function findUserNotifications($user, $read, $limit = null)
    {
        $notifications = $this->createQueryBuilder("l");

        $notifications
            ->leftJoin("l.notification", 'n')
            ->andWhere("l.readStatus = :read")
            ->andWhere("l.user = :userId")
            ->andWhere("n.startDate < :date")
            ->setParameter("date", new \DateTime())
            ->setParameter("userId", $user->getId())
            ->setParameter("read", $read)
            ->orderBy('n.startDate', 'DESC')
        ;
        if ($limit !== null) {
            $notifications->setMaxResults($limit);
        }        
        return $notifications->getQuery()->getResult();
    }

}
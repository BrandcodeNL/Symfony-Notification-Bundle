<?php


namespace BrandcodeNL\SymfonyNotificationBundle\Repository;

use Doctrine\ORM\EntityRepository;

class NotificationLinkRepository extends EntityRepository
{

    public function findNotificationLinks($user, $read)
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
        if ($read) {
            $notifications->setMaxResults(10);
        }        
        return $notifications->getQuery()->getResult();
    }

}
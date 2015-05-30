<?php


namespace AppBundle\EventListener;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\User;

/**
 * Description.
 *
 * @author Artem Zhuravlev <infzanoza@gmail.com>
 */
class UpdateDate {

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof User) {

            $items = $entity;

            $dql = 'SELECT u FROM AppBundle:User u WHERE u.id = :items';

            $query = $entityManager
                ->createQuery($dql)
                ->setParameter('items', $items)
                ->setHydrationMode(\Doctrine\ORM\Query::HYDRATE_ARRAY);

            $users =  $query->getResult();

            /** @var \AppBundle\Entity\User $user */
            foreach($users as $user){
                $user->setName('User Updated');
                $entityManager->persist($user);
            }

            $entityManager->flush();
        }

    }
}
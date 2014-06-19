<?php
	namespace MyBlog\BlogBundle\Entity\Repository;

	use Doctrine\ORM\EntityRepository;

	/**
	 * MyBlog\BlogBundle\Entity\Repository\PostRepository
	*/
	class PostRepository extends EntityRepository{
		/**
		 * Get total of posts
		 *
		 * @return integer
		*/
		public function postsTotal(){
			return $this->getEntityManager()
						->createQuery( 'SELECT COUNT(p.id) FROM BlogBundle:Post p' )
						->getSingleScalarResult();
		}
	}
<?php
	namespace MyBlog\BlogBundle\Entity\Repository;

	use Doctrine\ORM\EntityRepositry;
	use MyBlog\BlogBundle\Entity\Post;

	/**
	 * MyBlog\BlogBundle\Entity\Repository\CommentRepository
	*/
	class CommentRepository extends EntityRepository{
		/**
		 * @return MyBlog\BlogBundle\Entity\Post
		*/
		public function getCommentsByPost( Post $post ){
			return $this->getEntityManager()
						->createQuery( 'SELECT * FROM BlgBundle:Comment 
										WHERE `post` = :post' )
						->setParameter( 'post', $post )
						->getResult();
		}
	}
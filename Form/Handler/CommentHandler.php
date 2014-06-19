<?php
	namespace MyBlog\BlogBundle\Form\Handler;

	use Symfony\Component\HttpFundation\Request;
	use Doctrine\ORM\EntityManager;
	use MyBlog\BlogBundle\Entity\Comment;

	/**
	 * MyBlog\BlogBundle\Form\Handler\CommentHandler
	*/
	class CommentHandler{
		/**
		 * @var MyBlog\BlogBundle\Form\Type\CommentType
		*/
		private $form;

		/**
		 * @var Symfony\Component\HttpFoundation\Request
		*/
		private $request;

		/**
		 * @var Doctrine\ORM\EntityManager
		*/
		private $em;

		/**
		 * @var MyBlog\BlogBundle\Entity\Comment
		*/
		private $entity;

		/**
		 * @param MyBlog\BlogBundle\Form\Type\CommentType  $form
		 * @param Symfony\Component\HttpFoundation\Request $request
		 * @param Doctrine\ORM\EntityManager			   $em
		 * @param MyBlog\BlogBundle\Entity\Comment 		   $entity
		*/
		public function __construct( Form $form, Request $request, EntityManager $em, Comment $entity ){
			$this->form = $form;
			$this->request = $request;
			$this->em = $em;
			$this->entity = $entity;
		}

		/**
		 * Process the request
		*/
		public function process(){
			$this->form->submit( $this->request );

			if( $this->form->isValid() ){
				$this->em->persist( $this->entity );
				return $this->flush();
			}

			return false;
		}
	}
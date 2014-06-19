<?php
	namespace MyBlog\BlogBundle\Form\Type;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;

	/**
	 * MyBlog\BlogBundle\Form\CommentType
	*/
	class CommentType extends AbstractType{
		/**
		 * @var integer
		*/
		protected $postId;

		/**
		 * @param integer $postId
		*/
		public function __construct( $postId ){
			$this->postId = $postId;
		}

		/**
		 * @param \Symfony\Component\Form\FormBuilderInterface  $builder
		 * @param array 										$options
		*/
		public function buildForm( FormBuilderInterface $builder, array $options ){
			$builder
				->add(
					'user_name',
					'text',
					array(
						'required' => true
					)
				)
				->add(
					'text',
					'textarea',
					array(
						'required' => true
					)
				)
				->add(
					'comment',
					'submit'
				)
				->add(
					'post_id',
					'hidden',
					array(
						'data' => $this->postId
					)
				);
		}

		public function setDefaultOptions( OptionsResolverInterface $resolver ){
			$resolver->setDefault( array(
				'data_class' => 'MyBlog\BlogBundle\Entity\Comment'
			) );
		}

		/**
		 * @return string
		*/
		public function getName(){
			return 'comment';
		}
	}
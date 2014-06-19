<?php
	namespace MyBlog\BlogBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * MyBlog\BlogBundle\Entity\Comment
	 *
	 * @ORM\Table(name="comments")
	 * @ORM\Entity(repositoryClass="MyBlog\BlogBundle\Entity\Repository\CommentRepository")
	*/
	class Comment{
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="AUTO")
		*/
		protected $id;

		/**
		 * @var MyBlog\BlogBundle\Entity\Post
		 *
		 * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
		 * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
		*/
		protected $post;

		/**
		 * @var integer
		 *
		 * @ORM\Column(name="user_name", type="string", length=255)
		*/
		protected $user_name;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="text", type="text")
		*/
		protected $text;

		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="created_at", type="datetime")
		*/
		protected $created_at;

		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="updated_at", type="timestamp")
		*/
		protected $updated_at;

		/**
		 * @return integer
		*/
		public function getId(){
			return $this->id;
		}

		/**
		 * @return MyBlog\BlogBundle\Entity\Post
		*/
		public function getPost(){
			return $this->post;
		}

		/**
		 * @return string
		*/
		public function getUserName(){
			return $this->user_name;
		}

		/**
		 * @return string
		*/
		public function getText(){
			return $this->text;
		}

		/**
		 * @return \DateTime
		*/
		public function getCreatedAt(){
			return $this->created_at;
		}

		/**
		 * @return \DateTime
		*/
		public function getUpdatedAt(){
			return $this->updated_at;
		}

		/**
		 * Set a column
		*/
		public function __set( $column, $value ){
			$columns = get_object_vars( $this );

			if( !in_array( $column, $columns ) ){
				throw new Exception( 'Column not found: ' . $column );
			}

			$this->{ $column } = $value;
		}
	}
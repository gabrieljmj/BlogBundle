<?php
	namespace MyBlog\BlogBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * MyBlog\BlogBundle\Entity\Post
	 *
	 * @ORM\Table(name="posts")
	 * @ORM\Entity(repositoryClass="MyBlog\BlogBundle\Entity\Repository\PostRepository")
	*/
	class Post{
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="AUTO")
		*/
		protected $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="title", type="string", length=255)
		*/
		protected $title;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="text", type="string")
		*/
		protected $text;

		/**
		 * @var Doctrine\Common\Collections\Collection
		 *
		 * @ORM\OneToMany(targetEntity="Comment", mappedBy="post_id", cascade={"remove"})
		*/
		protected $comments;

		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="created_at", type="datetime")
		*/
		protected $created_at;

		/**
		 * @var \DateTime
		*/
		protected $updated_at;

		/**
		 * @return integer
		*/
		public function getId(){
			return $this->id;
		}

		/**
		 * @return string
		*/
		public function getTitle(){
			return $this->title;
		}

		/**
		 * @return string
		*/
		public function getText(){
			return $this->text;
		}

		/**
		 * @return Doctrine\Common\Collections\Collection
		*/
		public function getComments(){
			return $this->comments;
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
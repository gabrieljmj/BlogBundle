<?php
	namespace MyBlog\BlogBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use MyBlog\BlogBundle\Form\Type\CommentType;
	use MyBlog\BlogBundle\Entity\Comment;

	/**
	 * MyBlog\BlogBundle\Controller\BlogController
	*/
	class PostsController extends Controller{
		public function indexAction(){
			$postsRepo = $this->getDoctrine()->getRepository( 'BlogBundle:Post' );
			$posts = $postsRepo->findAll();
			$postsTotal = $postsRepo->postsTotal();

			if( $postsTotal < 1 ){
				$this->get('session')->getFlashBag()->add( 'notice', 'No posts found' );
			}

			return $this->render( 'BlogBundle:Posts:index.html.twig', array( 
				'posts' => $posts, 
				'postsTotal' => $postsTotal 
			) );
		}

		public function readAction( $id ){
			$postsRepo = $this->getDoctrine()->getRepository( 'BlogBundle:Post' );
			$post = $postsRepo->find( $id );
			$postExists = ( !$post ) ? false : true;

			$comment = new Comment();
			$comment->post = $post;

			$commentForm = $this->createForm( new CommentType( $id ), $comment, array( 'action' => $this->generateUrl( 'blog_comment' ) ) );

			if( !$post ){
				$this->get('session')->getFlashBag()->add( 'post_not_found', 'Post not found' );
			}

			return $this->render( 'BlogBundle:Posts:read.html.twig', array( 
				'post' => $post, 
				'postExists' => $postExists,
				'commentForm' => $commentForm->createView(),
				'comments' => $comments
			) );
		}
	}
<?php
	namespace MyBlog\BlogBundle\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use MyBlog\BlogBundle\Entity\Comment;
	use Symfony\Component\HttpFoundation\Request;

	/**
	 * MyBlog\BlogBundle\Controller\CommentsController
	*/
	class CommentsController extends Controller{
		public function createAction( Request $request ){
			$postsRepo = $this->getDoctrine()->getRepository( 'BlogBundle:Post' );
			$post = $postsRepo->find( $request->get( 'post_id' ) );

			if( !$post ){
				$this->redirect( $this->generateUrl( 
					'blog_readpost', 
					array( 'id' => $request->get( 'post_id' ) )
				) );
			}

			$comment = new Comment();
			$comment->post = $post;

			$doctrine = $this->getDoctrine()->getManager();
			$doctrine->persist( $comment );
			$doctrine->flush();

			$this->redirect( $this->generateUrl( 
				'blog_readpost', 
				array( 'id' => $request->get( 'post_id' ) )
			) );
		}
	}
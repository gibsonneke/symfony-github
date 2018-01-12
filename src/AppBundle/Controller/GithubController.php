<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GithubController extends Controller
{
    /**
     * @Route("/{username}", name="github", defaults={"username":"gibsonneke"})
     */
    public function githubAction(Request $request, $username)
    {
        return $this->render('github/index.html.twig', ['username' => $username]);
    }
    
    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, $username){
        $profileData = $this->get('github_api')->getProfile($username);
        
        return $this->render('github/profile.html.twig', $profileData);
    }
    
    /**
     * @Route("/repos/{username}", name="repos")
     */
    public function reposAction(Request $request, $username){
        $repos = $this->get('github_api')->getRepositories($username);
        
        return $this->render('github/repos.html.twig', $repos);
    }
}

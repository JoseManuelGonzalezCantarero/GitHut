<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/", name="githut")
     */
    public function githutAction(Request $request)
    {
        $templateData = [
            'avatar_url'  => 'https://avatars.githubusercontent.com/u/6990881?v=3',
            'name'        => 'Jose Manuel Gonzalez Cantarero',
            'login'       => 'JoseManuelGonzalezCantarero',
            'details'     => [
                'company'   => 'Code Review Videos',
                'location'  => 'Preston, Lancs, UK',
                'joined_on' => 'Joined on Fake Date For Now',
            ],
            'blog' => 'https://codereviewvideos.com/',
            'social_data' => [
                'followers'    => 0,
                'following'    => 1,
                'public_repos' => 7,
            ],
            'repo_count' => 100,
            'most_stars' => 50,
            'repos' => [
                [
                    'url' => 'https://codereviewvideos.com',
                    'name' => 'Code Review Videos',
                    'description' => 'some repo description',
                    'stargazers_count' => '999',
                ],
                [
                    'url' => 'http://bbc.co.uk',
                    'name' => 'The BBC',
                    'description' => 'not a real repo',
                    'stargazers_count' => '666',
                ],
                [
                    'url' => 'http://google.co.uk',
                    'name' => 'Google',
                    'description' => 'another fake repo description',
                    'stargazers_count' => '333',
                ],
            ],
        ];
        return $this->render('githut/index.html.twig', $templateData);
    }
}

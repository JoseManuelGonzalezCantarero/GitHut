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
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/JoseManuelGonzalezCantarero');
        $data = json_decode($response->getBody()->getContents(), true);
        $templateData = [
            'avatar_url'  => $data['avatar_url'],
            'name'        => $data['name'],
            'login'       => $data['login'],
            'details'     => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog' => $data['blog'],
            'social_data' => [
                'followers'    => $data['followers'],
                'following'    => $data['following'],
                'public_repos' => $data['public_repos'],
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

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        $mongoUri = implode(',', $this->getParameter('database_uri'));
        $databaseName = $this->getParameter('database_name');
        $collection = 'posts';

        $filter = [
            // 'author' => 'bjori',
        ];

        $options = [
            'projection' => [
                'id' => 1,
                'title' => 1,
            ],
        ];

        var_dump($mongoUri);

        $query = new \MongoDB\Driver\Query($filter, $options);


        try {
            $manager = new \MongoDB\Driver\Manager($mongoUri);
            $readPreference = new \MongoDB\Driver\ReadPreference(\MongoDB\Driver\ReadPreference::RP_PRIMARY);
            $cursor = $manager->executeQuery($databaseName.'.'.$collection, $query, $readPreference);

            foreach($cursor as $document) {
                var_dump($document);
            }
        } catch(\Exception $e) {
            var_dump($e->getMessage());
        }


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => $this->getParameter('database_uri')[0],
        ]);
    }
}

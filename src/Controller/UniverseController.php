<?php

namespace App\Controller;

use App\Document\Map;
use App\Document\Marker;
use App\Document\PiecedText;
use App\Form\ImageUpload;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Document\Universe;
use MongoDB\Driver;
use App\Services\FileUploader;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UniverseController extends Controller
{

    const debug = true;

    /**
     * @Route("/universe", name="universe_index")
     * @Template()
     */
    public function index()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
//        $user = $this->getUser();   아직 로그인이 없어서 헤헿
        $idUser= 1;

        $myUniverses = $dm->getRepository('App:Universe')->findByIdUser($idUser);



        return ['myUniverses' => $myUniverses];
    }

    /**
     * @Route("/universe/{universe}", name="universe_home")
     * @Template()
     */
    public function universeHome($universe)
    {
        $mapInfo = $this->mapAllLoad($universe);
        $locals = $mapInfo['locals'];
        $isNew = false;
        if(empty($locals)){
            $isNew = true;
        }

        return ['locals'=>$locals,'is_new'=>$isNew, 'id_universe'=> $universe ];
    }

    /**
     * @Route("/universe/aboutPlays", name="universe_about_play")
     * @Template()
     */
    public function universeAboutPlay()
    {
        return [];
    }


    /**
     * @Route("/universe/{universe}/local/view/{id}", name="local_view")
     * @Template()
     */
    public function mapView($universe, $id)
    {
 //       $request = Request::createFromGlobals();
/*        if(!empty($request->getContent())) {
            $data = json_decode($request->getContent());
        }else return false;*/
        $idUniverse = 1;
        $infos = $this->mapLoad($idUniverse,$id);

        if(is_string($infos))
        {
            return ['error'=>$infos];
        }
        return ['local'=>$infos['local'],'markers'=>$infos['markers'],'id_universe'=> $universe ];

    }

    /**
     * @Route("/universe/{universe}/local/new", name="local_new")
     * @Template()
     */
    public function universeLocalNew($universe, Request $request, FileUploader $fileUploader)
    {
        $universe_id = 1;
        $dm = $this->get('doctrine_mongodb')->getManager();
        $myUniverse = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$universe_id);
        $newLocal = new Map();

        $form = $this->createForm(ImageUpload::class, $newLocal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $newLocal->getImageUrl();

            $fileName = $fileUploader->upload($file);

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
 /*           var_dump($newLocal);
            $newLocal->setMapName($data['mapName']);*/
            $newLocal->setImageUrl($fileName);

            // ... persist the $product variable or any other work
            $myUniverse->addMap($newLocal);

            $dm->persist($myUniverse);
            $dm->flush();

            return $this->redirect($this->generateUrl('local_list',["universe"=>$universe]));
        }
        return ['form' => $form->createView(), 'id_universe'=>$universe];
    }

    /**
     * @Route("/universe/{universe}/local/list", name="local_list")
     * @Template()
     */
    public function universeLocalList($universe,Request $request)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $myUniverse = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$universe);

        $universeMaps = $myUniverse->getMaps();

        return ['locals'=>$universeMaps, 'id_universe'=>$universe];
    }

    /**
     * @Route("/universe/{universe}/timeline", name="timeline_view")
     * @Template()
     */
    public function timelineView($universe)
    {
        return [];
    }

    /**
     * @Route("/universe/{universe}/local/edit/{id}", name="local_edit")
     * @Template()
     */
    public function mapEdit($universe,$id)
    {
        //       $request = Request::createFromGlobals();
        /*        if(!empty($request->getContent())) {
                    $data = json_decode($request->getContent());
                }else return false;*/

        $infos = $this->mapLoad($universe,$id);
        if(is_string($infos))
        {
            return ['error'=>$infos];
        }
        return ['local'=>$infos['local'],'markers'=>$infos['markers'], 'id_universe'=>$universe];
    }

    /**
     * @Route("/universe/{universe}/local/{id}/marker/save", name="local_marker_save")
     */
    public function localMarkerSave($universe, $id)
    {
        $request = Request::createFromGlobals();
        if(!empty($request->getContent())) {
            $data = json_decode($request->getContent());
        }else return new JsonResponse(false);

        $dm = $this->get('doctrine_mongodb')->getManager();
        $myUniverse = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$universe);

        $dataTitle = $data->title;
        $dataInfo = $data->info;
        $dataPositionX = $data->positionX;
        $dataPositionY = $data->positionY;

        $universeMaps = $myUniverse->getMaps();

        foreach($universeMaps as $universeMap )
        {
            if($universeMap->getId() == $id)
            {
                $marker = new Marker();
                $marker->setPositionTitle($dataTitle);
                $piecedText = new PiecedText();
                $piecedText->setContext($dataInfo);
                $marker->setPiecedTexts($piecedText);
                $marker->setPositionX($dataPositionX);
                $marker->setPositionY($dataPositionY);
                $universeMap->addMarker($marker);
                $myUniverse->replaceLocal($id, $universeMap);
                $dm->persist($myUniverse);
                return new RedirectResponse($this->generateUrl('test',['showItem'=>new JsonEncode( $myUniverse)]));
                $dm->flush();
            }
        }
        return new JsonResponse($data);
    }


    /**
     * @Route("/universe/{universe}/local/{id}/test", name="test")
     * @Template()
     */
    public function test($universe, $id)
    {
//
//        $request = Request::createFromGlobals();
//        if(!empty($request->getContent())) {
//            $data = json_decode($request->getContent());
//        }else return new JsonResponse(false);

        $dm = $this->get('doctrine_mongodb')->getManager();
        $myUniverse = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$universe);

        $dataTitle = 'aaaaaa';
        $dataInfo = 'bbbbbbbbbb';
        $dataPositionX = 255;
        $dataPositionY = 400;


        foreach($myUniverse->getMaps() as &$universeMap )
        {
            if($universeMap->getId() == $id)
            {
                $marker = new Marker();
                $marker->setPositionTitle($dataTitle);
                $piecedText = new PiecedText();
                $piecedText->setContext($dataInfo);
                $marker->addPiecedText($piecedText);
                $marker->setPositionX($dataPositionX);
                $marker->setPositionY($dataPositionY);
                $universeMap->addMarker($marker);
                $myUniverse->replaceLocal($id, $universeMap);
                $dm->persist($myUniverse);
                $dm->flush();
            }
        }
        return [];
    }

    public function mapLoad($idUniverse ,$id = null)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        $universe = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$idUniverse);

        $local = null;

        $markers =null;
        $universeMaps = $universe->getMaps();

        if(empty($universeMaps))
        {
            if(empty($viewMap)){
                //에러메세지 발생
//                errorCode[21];

            }else
            {
                //에러메세지 발생
//                errorCode[22];
            }
        }else
        {
            foreach($universeMaps as $map)
            {
                if($map->getId() == $id)
                {
                    $local = $map;

                    $markers = $local->getMarkers();
                }
            }
        }

        return ['local'=>$local, 'markers'=>$markers];
    }

    public function mapAllLoad($idUniverse)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();

        $universe = $dm->getRepository('App:Universe')->findOneByIdUniverse((int)$idUniverse);

        $locals = [];

        $markers = [];
        $universeMaps = $universe->getMaps();

        if(empty($universeMaps))
        {
            if(empty($viewMap)){
                //에러메세지 발생
//                errorCode[21];

            }else
            {
                //에러메세지 발생
//                errorCode[22];
            }
        }else
        {
            foreach($universeMaps as $map)
            {
                array_push( $locals, $map);
                array_push( $markers, $map->getMarkers());
            }
        }

        return ['locals'=>$locals, 'markers'=>$markers];
    }


    /**
     * @Route("/universe/{id_universe}/local/{id_local}/delete", name="local_delete")
     */
    public function localDelete($id_universe, $id_local)
    {
        $request = Request::createFromGlobals();
        if(!empty($request->getContent())) {
            $data = json_decode($request->getContent());
        }else return false;

        $dm = $this->get('doctrine_mongodb')->getManager();
        $universe = $dm->getRepository('App:universe')->findOneByIdUniverse($id_universe);

        $universe->removeMap($id_local);

        $dm->persist($universe);
        $dm->flush();

        return new JsonResponse($data);
    }

    /**
     * @Route("/universe/{id_universe}/local/{id_local}/name", name="local_edit_name")
     */
    public function localNameEdit($id_universe, $id_local)
    {
        $request = Request::createFromGlobals();
        if(!empty($request->getContent())) {
            $data = json_decode($request->getContent());
        }else return false;

        $name = $data->localName;
        $dm = $this->get('doctrine_mongodb')->getManager();
        $universe = $dm->getRepository('App:universe')->findOneByIdUniverse($id_universe);

    //    $universe->setName($name);
        $local = $universe->getLocal($id_local);
        $local->setName($name);
        $universe->replaceLocal($id_local, $local);

        $dm->persist($universe);
        $dm->flush();

        return new JsonResponse($data);
    }
}

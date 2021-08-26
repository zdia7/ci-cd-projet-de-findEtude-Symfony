<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Technologie;
use App\Entity\Kpi;
use App\Entity\Famille;
use App\Entity\Statut;
use App\Entity\Porteur;
use App\Entity\Delai;
use App\Entity\Age;
use App\Entity\Vr;
use App\Entity\AtteinteVr;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Form\TechnologieType;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_page")
     * @return Response
     * @Method({"GET","POST"})
     */
    public function default(Request $request) {
    $entityManager = $this->getDoctrine()->getManager();
    $repository = $this->getDoctrine()->getRepository(Technologie::class);
    $listTechnologies = $repository->findAll();
    $formViews = array();
    $n = 0;
    foreach($listTechnologies as $tech) {
      $form[$n] = $this->createForm(TechnologieType::class, $tech);
      $n++;
    }
    $techno = new Technologie();
    $formSubmitted = $this->createForm(TechnologieType::class, $techno);
    if ($request->isMethod('POST')) {
      $formSubmitted->handleRequest($request);
      if ($formSubmitted->isSubmitted()) { 
        $technologie = $formSubmitted->getData();
        $entityManager->persist($technologie);
        $entityManager->flush();
        return $this->redirectToRoute('admin');
      }
    }
    $n = 0;
    foreach($listTechnologies as $tech) {
      $formViews[$n] = $form[$n]->createView();
    }
    return $this->render("datatable.html.twig", [
      't' => $listTechnologies,
      'formViews' => $form[$n]->createView()
    ]);
  }


    /**
     * @Route("/generation", name="generation")
     */
    public function generation(Request $request)
    {
      // Création du nouveau document ...
        $phpWord = new PhpWord();
        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $html = $this->renderView('datatable.html.twig');
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );

        // Saving the document as OOXML file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

        // Create a temporal file in the system
        $fileName = 'hello_world_download_file.docx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Write in the temporal filepath
        $objWriter->save($temp_file);

        // Send the temporal file as response (as an attachment)
        $response = new BinaryFileResponse($temp_file);
        /**$response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $fileName
        );*/

        return $response;
    }

    /**
     * @Route("admin/{pageName}", name="admin_default")
     * @param string $pageName Page name
     * @return Response
     */
    public function index(string $pageName)
    {
        return $this->render(
            sprintf(
                "%s.html.twig",
                $pageName
            )
        );
    }

 
   

/**
 * @Route("/technologie/edit/{id}", name="update")  
 */
public function update($id, Request $request)
{
    $entityManager = $this->getDoctrine()->getManager();
    $technologie = $entityManager->getRepository(Technologie::class)->find($id);
    if (null === $technologie) {
        throw new NotFoundHttpException("La technologie d'id ".$id." n'existe pas.");
      }
    $form = $this->createForm(TechnologieType::class, $technologie);
    
    $technologie = $entityManager->getRepository(Technologie::class)->find($id);

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);
      if ($form->isSubmitted()  && $form->isValid()) {
        $entityManager->persist($technologie);
        $entityManager->flush();
        return $this->redirectToRoute('admin_page', array('id' => $technologie->getId()));
      }
    }
    return $this->render("compose.html.twig", [
      'form' => $form->createView(), 't' => $technologie
    ]);
}

/**
 * @Route("/technologie/detail/{id}", name="details")  
 */
public function detail($id)
{
    $entityManager = $this->getDoctrine()->getManager();
    $technologie = $entityManager->getRepository(Technologie::class)->find($id);
    return $this->render("email.html.twig", [
      't' => $technologie
    ]);
}


}

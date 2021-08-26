<?php
//require_once ' bootstrap.php ' ;

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Entity\Technologie;
use App\Entity\Famille;

class GenerationController extends AbstractController
{
    /**
     * @Route("/generation", name="generation")
     */
    public function index(Request $request)
    {
        $technologie = new Technologie();
    	// Création du nouveau document ...
    	$phpWord = new PhpWord();
        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        /**$section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );*/
        
$html='<h1>RAPPORT GENERE</h1>';
$listTechnologies = $this -> getDoctrine () -> getRepository ( Technologie :: class )-> findAll ();
//$technologie->setTechno ('Huawei');        
//$techno = $technologie -> getTechno ();
foreach ($listTechnologies as $technologie)
 {
    
    $nom_cellule = $technologie->getNomCellule();
    $occurences = $technologie->getOccurences();
    $total = $technologie->getTotal();
    $total_general = $technologie->gettotal_general();
    $probleme = $technologie->getProbleme();
    $planMaitrise = $technologie->getPlanMaitrise();
    $ticket = $technologie->getTicket();
    $kpi = $technologie->getKpi();
    $nomFamille = $technologie->getNomFamille();
    $optionOk = $technologie->getOptionOk();
    $nomPorteur = $technologie->getNomPorteur();
    $delai = $technologie->getDelai();
    $nomVr = $technologie->getNomVr();
    $optionVr = $technologie->getOptionVr();

    $html .= $technologie->getTechno();
    $html .= $nom_cellule;
    $html .= $occurences;
    $html .= $total;
    $html .= $total_general;
    $html .= $probleme;
    $html .= $planMaitrise;
    $html .= $ticket;
    $html .= $kpi;

    if(($technologie->getNomFamille()) != null)
    {
        $html .= $nomFamille->getNomFamille();
    }
    
    if(($technologie->getOptionOk()) != null)
    {
        $html .= $optionOk->getOptionOk();
    }

    if(($technologie->getNomPorteur()) != null)
    {
       $html .= $nomPorteur->getNomPorteur();
    }

    if(($technologie->getDelai()) != null)
    {
       $html .= $delai->getDelai();
    }
    
    if(($technologie->getNomVr()) != null)
    {
       $html .= $nomVr->getNomVr();
    }

    if(($technologie->getOptionVr()) != null)
    {
        $html .= $optionVr->getOptionVr();
    }
    
    $html.= '<br/>';
 }

$html .= '<p>A link to <a href="http://phpword.readthedocs.io/" style="text-decoration: underline">Read the docs</a></p>';
$html .= '<p lang="he-IL" style="text-align: right; direction: rtl">היי, זה פסקה מימין לשמאל</p>';
$html .= '<p style="margin-top: 240pt;">Unordered (bulleted) list:</p>';
$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
$html .= '<p style="margin-top: 240pt;">1.5 line height with first line text indent:</p>';
$html .= '<p style="text-align: justify; text-indent: 70.9pt; line-height: 150%;">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';

$html .= '<table align="center" style="width: 50%; border: 6px #0000FF double;">
                <thead>
                    <tr style="background-color: #FF0000; text-align: center; color: #FFFFFF; font-weight: bold; ">
                        <th style="width: 50pt">header a</th>
                        <th style="width: 50">header          b</th>
                        <th style="background-color: #FFFF00; border-width: 12px"><span style="background-color: #00FF00;">header c</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td style="border-style: dotted; border-color: #FF0000">1</td><td colspan="2">2</td></tr>
                    <tr><td>This is <b>bold</b> text</td><td></td><td>6</td></tr>
                </tbody>
            </table>';
$html .= '<p style="margin-top: 240pt;">Table inside another table:</p>';
$html .= '<table align="center" style="width: 80%; border: 6px #0000FF double;">
    <tr><td>
        <table style="width: 100%; border: 4px #FF0000 dotted;">
            <tr><td>column 1</td><td>column 2</td></tr>
        </table>
    </td></tr>
    <tr><td style="text-align: center;">Cell in parent table</td></tr>
</table>';
$html .= '<p style="margin-top: 240pt;">The text below is not visible, click on show/hide to reveil it:</p>';
$html .= '<p style="display: none">This is hidden text</p>';
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
        // Saving the document as OOXML file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        // Create a temporal file in the system
        $fileName = 'hello_world_download_file.docx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        // Write in the temporal filepath
        $objWriter->save($temp_file);
        // Send the temporal file as response (as an attachment)
        //$response = new BinaryFileResponse($temp_file);
        /**$response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $fileName
        );*/

        $response = new BinaryFileResponse($temp_file);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $fileName
        );
        return $response;
        /**return new Response($pdfGenerator->generatePDF($html),
                    200,
                    array(
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="out.pdf"'
                    )
        );
        */
    }

    // affichage du contenu de la page servant de rapport
    /**
     * @Route("/rapport", name="rapport")
     */
    public function detail(Request $request)
    {
        $listTechnologies = $this -> getDoctrine () -> getRepository ( Technologie :: class )-> findAll ();
     
        return $this->render('technologie.html.twig',
                array('t'=>$listTechnologies
                ));
    }
}

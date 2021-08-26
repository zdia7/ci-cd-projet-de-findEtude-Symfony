<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\ResponseHeaderBag;
//use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Entity\Technologie;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\File;


class TechnologieController extends AbstractController
{
    public function tableauDeRecuperation($spreadsheet)
        {
          $entityManager = $this->getDoctrine()->getManager();
          $technologie = new Technologie ();

          $worksheet = $spreadsheet->getActiveSheet();
          $highestRow = $worksheet->getHighestRow();
          $highestColumn = $worksheet->getHighestColumn();
          $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
          echo '<table>' . "\n";
          for ($row = 2; $row <= $highestRow; ++$row) {
              echo '<tr>' . PHP_EOL;
                   $technologie = new Technologie();
                  $col = 0;
              //for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                  $techno = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                  $technologie -> setTechno ($techno);

                  $nom_cellule = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                  $technologie -> setNomCellule ($nom_cellule);

                  $occurences = (float)$worksheet->getCellByColumnAndRow(3, $row)->getValue();
                  $technologie -> setOccurences ($occurences);

                  $total = (float)$worksheet->getCellByColumnAndRow(4, $row)->getValue();
                  $technologie -> setTotal ($total);
                  $total_general = (float)$worksheet->getCellByColumnAndRow(5, $row)->getValue();
                  $technologie -> setTotalGeneral ($total_general);
                  $entityManager -> persist ($technologie);
                  //echo '<td>' . $value . '</td>' . PHP_EOL;
             // }
              $entityManager -> flush ();
              echo '</tr>' . PHP_EOL;
          }

          return $highestColumnIndex; 
        }
    /**
     * @Route("/technologie", name="technologie")
     */
    public function indexAction()
    {   
       
        $fileName = md5(uniqid()).'.xlsx';

        $spreadsheet = new Spreadsheet();
        //$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
        $inputFileName = './test.ods';
         /** Load $inputFile Name to a Spreadsheet Object **/
        //$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $inputFileType = 'Ods';
        $inputFileName = './test.ods';

        /**  Create a new Reader of the type defined in $inputFileType  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        /**  Advise the Reader that we only want to load cell data  **/
        $reader->setReadDataOnly(true);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);

        $highestColumnIndex = $this->tableauDeRecuperation($spreadsheet);

        return $this->render('datatable.html.twig', array('t'=>$listTechnologies)); 


       //return $this->render("datatable.html.twig");
    }
 }



<?php

namespace App\Controller;

use App\Entity\Dataitems;
use App\Form\ItemsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ItemsController extends AbstractController
{
    /**
     * @Route("/items", name="items")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ItemsType::class, [
            'action' => $this->generateUrl('items'),
            'method' => 'GET'
        ]);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            // Uploading file to the server
            $file = $form->get('datafile')->getData();
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = 'datafile.'.$file->guessExtension();

            $file->move(
                $uploads_directory,
                $filename
            );
            if($form->get('dataCheckbox')->getData()){
                $this->saveDataToDB(1);
            }
            else{
                $this->saveDataToDB(0);
            }
        }

        return $this->render('items/index.html.twig', [
            'itemsform' => $form->createView()
        ]);
    }

    private function saveDataToDB($check)
    {
        $fileName = __DIR__ . '/../../public/upload/datafile.xlsx';

        $spreadsheet = IOFactory::load($fileName);
        $row = $spreadsheet->getActiveSheet()->removeRow(1);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $entityManager = $this->getDoctrine()->getManager(); 
    
        foreach ($sheetData as $Row) 
        {
            $id = $Row['A'];
            if($check == 1){
                $id_existant = $entityManager->getRepository(Dataitems::class)->findOneBy(array('id' => $id)); 
                if(!$id_existant){
                    $marke = $Row['B'];
                    $material= $Row['C'];
                    $item = new Dataitems(); 
                    $item->setId($id);
                    $item->setMarke($marke);
                    $item->setMaterial($material);
                    $entityManager->persist($item); 
                    $entityManager->flush();
                }
            }
            else{
                $item = $entityManager->getRepository(Dataitems::class)->find($id);
                $marke = $Row['B'];
                $material= $Row['C'];
                $item->setId($id);
                $item->setMarke($marke);
                $item->setMaterial($material);
                $entityManager->persist($item); 
                $entityManager->flush();
            }
        }
        echo '<script language="javascript">';
        echo 'alert("Items table has been updated!!")';
        echo '</script>';
    }
}

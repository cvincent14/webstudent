<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EtudiantController extends AbstractController
{
    /*
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
        /* Cette simple instruction permet d'envoyer des informations au navigateur sans passer par une vue.
        return new Response('<html><body>Salut Les SIO</body></html>');
        */

         // initialise une variable qui sera exploitée dans la vue
         $annee = '2019';
         return $this->render('etudiant/accueil.html.twig', ['pAnnee' => $annee,
        ]);                      
    }

    public function ajouterEtudiant()
    {
        
    // récupère le manager d'entités
        $entityManager = $this->getDoctrine()->getManager();

        // instanciation d'un objet Etudiant
        $etudiant = new Etudiant();
        $etudiant->setNom('Potter');
        $etudiant->setPrenom('Harry');
        $etudiant->setRue('4 Privet Drive');
        $etudiant->setCopos('50107');
        $etudiant->setSurnom("Le Ballafré");
        $etudiant->setDateNaiss(new \DateTime('1980-07-31'));
        $etudiant->setVille('Surrey');
        $etudiant->setMaison('Griffondor');

        // Indique à Doctrine de persister l'objet
        $entityManager->persist($etudiant);

        // Exécue l'instruction sql permettant de persister lobjet, ici un INSERT INTO
        $entityManager->flush();

        // renvoie vers la vue de consultation de l'étudiant en passant l'objet etudiant en paramètre
       return $this->render('etudiant/consulter.html.twig', [
            'etudiant' => $etudiant,]);
        
    }

    public function consulterEtudiant($id){
        
        $etudiant = $this->getDoctrine()
        ->getRepository(Etudiant::class)
        ->find($id);

        if (!$etudiant) {
            throw $this->createNotFoundException(
            'Aucun etudiant trouvé avec le numéro '.$id
            );
        }

        //return new Response('Etudiant : '.$etudiant->getNom());
        return $this->render('etudiant/consulter.html.twig', [
            'etudiant' => $etudiant,]);
    }

    public function listerEtudiant(){
        $repository = $this->getDoctrine()->getRepository(Etudiant::class);
        $etudiants = $repository->findAll();
        return $this->render('etudiant/lister.html.twig', [
            'pEtudiants' => $etudiants,]);  
            
    }
}


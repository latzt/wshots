<?php

namespace App\Controller;

use App\Form\PhotosFormType;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPageController extends AbstractController
{
    #[Route('/', name: 'app_front_page')]
    public function index(Request $request, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(PhotosFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile[] $photos */
            $photos = $form->get('photos')->getData();

            foreach($photos as $photo) {
                $fileUploader->upload($photo);
            }

            // ... show success message
            $this->addFlash(
                'notice',
                new TranslatableMessage('Your uploaded images were saved!')
            );

            return $this->redirectToRoute('app_front_page');
        }

        return $this->render('front_page/index.html.twig', [
            'form' => $form,
        ]);
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Spectacle;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpectacleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Spectacle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Nom du spectacle'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setBasePath('uploads/spectacles/')
                ->setUploadDir('public/uploads/spectacles/')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
            CollectionField::new('spectacleCharacters', 'Personnages du spectacle')
                ->allowAdd(true)
                ->allowDelete(true)
                ->showEntryLabel(false)
                ->useEntryCrudForm(SpectacleCharacterCrudController::class),
        ];
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Spectacle;
use App\Controller\Admin\GalleryCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Controller\Admin\SpectacleCharacterCrudController;
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
        yield FormField::addTab('Spectacle')->setIcon('masks-theater');
        yield TextField::new('title', 'Nom du spectacle');
        yield TextEditorField::new('description');
        yield ImageField::new('image')
            ->setFormTypeOption('required', false)
            ->setBasePath('uploads/spectacles/')
            ->setUploadDir('public/uploads/spectacles/')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');

        yield FormField::addTab('Personnages')->setIcon('users');
        yield CollectionField::new('spectacleCharacters', 'Personnages du spectacle')
            ->allowAdd(true)
            ->allowDelete(true)
            ->showEntryLabel(false)
            ->useEntryCrudForm(SpectacleCharacterCrudController::class);

        yield FormField::addTab('Représentations')->setIcon('calendar');
        yield CollectionField::new('calendars', 'Dates de spectacle')
            ->allowAdd(true)
            ->allowDelete(true)
            ->showEntryLabel(false)
            ->useEntryCrudForm(CalendarCrudController::class);

        yield FormField::addTab('Galerie')->setIcon('image');
        yield CollectionField::new('galleries', 'Images du spectacle')
            ->allowAdd(true)
            ->allowDelete(true)
            ->showEntryLabel(false)
            ->useEntryCrudForm(GalleryCrudController::class);

        yield FormField::addTab('Revues de presse')->setIcon('newspaper');
        yield CollectionField::new('pressReviews', 'Revues de presse')
            ->allowAdd(true)
            ->allowDelete(true)
            ->showEntryLabel(false)
            ->useEntryCrudForm(PressReviewCrudController::class);
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\PressReview;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PressReviewCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PressReview::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Revue de presse')
            ->setEntityLabelInPlural('Revues de presse');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('detail'),
            UrlField::new('link'),
            ImageField::new('image')
                ->setFormTypeOption('required', false)
                ->setBasePath('uploads/pressReviews/')
                ->setUploadDir('public/uploads/pressReviews/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
        ];
    }
}

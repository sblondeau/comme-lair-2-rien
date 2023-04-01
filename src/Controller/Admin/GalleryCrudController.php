<?php

namespace App\Controller\Admin;

use App\Entity\Gallery;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gallery::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('legend'),
            ImageField::new('image')
                ->setFormTypeOption('required', false)
                ->setBasePath('uploads/galleries/')
                ->setUploadDir('public/uploads/galleries/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),

        ];
    }
}

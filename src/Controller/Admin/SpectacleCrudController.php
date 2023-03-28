<?php

namespace App\Controller\Admin;

use App\Entity\Spectacle;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/spectacles/')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
        ];
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use App\Entity\SpectacleCharacter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SpectacleCharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SpectacleCharacter::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('companyMember', 'Membre')->setFormTypeOption('choice_label', 'fullName'),
            ImageField::new('image')
                ->setBasePath('uploads/characters/')
                ->setUploadDir('public/uploads/characters/')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
        ];
    }
}

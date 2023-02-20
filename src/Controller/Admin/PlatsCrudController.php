<?php

namespace App\Controller\Admin;

use App\Entity\Plats;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlatsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plats::class;
    }

    public function configureCrud(Crud $crud): crud
    
    {
        return $crud
        ->setEntityLabelInPlural('Plats')
        ->setEntityLabelInSingular('Plats');
    }
   
   

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

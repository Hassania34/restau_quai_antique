<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menus::class;
    }

    public function configureCrud(Crud $crud): crud
    
    {
        return $crud
        ->setEntityLabelInPlural('Menus')
        ->setEntityLabelInSingular('Menus');
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

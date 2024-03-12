<?php

namespace App\Controller\Admin;

use App\Entity\Jobtype;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobtypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Jobtype::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type'),    
        ];
    }
   
}

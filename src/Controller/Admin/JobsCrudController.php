<?php

namespace App\Controller\Admin;

use App\Entity\Jobs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Jobs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('reference'),
            TextField::new('description'),
            TextField::new('notes'),
            TextField::new('jobTitle'),
            TextField::new('location'),
            IntegerField::new('salary'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('closingDate'),
            BooleanField::new('activated'),
            AssociationField::new('compagny'),
            AssociationField::new('jobType'),
            AssociationField::new('JobCategory'),
           
            
        ];
    }
    
}

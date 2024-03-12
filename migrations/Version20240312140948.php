<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240312140948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('CREATE TABLE job_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE jobcategory');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('CREATE TABLE jobcategory (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE job_category');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5712A86AB FOREIGN KEY (job_category_id) REFERENCES jobcategory (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}

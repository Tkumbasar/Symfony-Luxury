<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313153451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE gender_id gender_id INT DEFAULT NULL, CHANGE experience_id experience_id INT DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE nationality nationality VARCHAR(255) DEFAULT NULL, CHANGE birthdate birthdate DATETIME DEFAULT NULL, CHANGE birth_place birth_place VARCHAR(255) DEFAULT NULL, CHANGE short_description short_description VARCHAR(255) DEFAULT NULL, CHANGE deleted_at deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE job_category job_category INT DEFAULT NULL, CHANGE admin_note admin_note VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat CHANGE gender_id gender_id INT NOT NULL, CHANGE experience_id experience_id INT NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE nationality nationality VARCHAR(255) NOT NULL, CHANGE birthdate birthdate DATETIME NOT NULL, CHANGE birth_place birth_place VARCHAR(255) NOT NULL, CHANGE short_description short_description VARCHAR(255) NOT NULL, CHANGE deleted_at deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE job_category job_category INT NOT NULL, CHANGE admin_note admin_note VARCHAR(255) NOT NULL');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313113304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apply (id INT AUTO_INCREMENT NOT NULL, jobs_id INT NOT NULL, status_id INT NOT NULL, candidat_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', admin_note VARCHAR(255) NOT NULL, INDEX IDX_BD2F8C1F48704627 (jobs_id), INDEX IDX_BD2F8C1F6BF700BD (status_id), INDEX IDX_BD2F8C1F8D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, gender_id INT NOT NULL, user_id INT NOT NULL, cv_id INT DEFAULT NULL, profil_pic_id INT DEFAULT NULL, passport_id INT DEFAULT NULL, experience_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, birthdate DATETIME NOT NULL, birth_place VARCHAR(255) NOT NULL, short_description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', job_category INT NOT NULL, admin_note VARCHAR(255) NOT NULL, is_available TINYINT(1) NOT NULL, INDEX IDX_6AB5B471708A0E0 (gender_id), UNIQUE INDEX UNIQ_6AB5B471A76ED395 (user_id), UNIQUE INDEX UNIQ_6AB5B471CFE419E2 (cv_id), UNIQUE INDEX UNIQ_6AB5B471EFAE74C3 (profil_pic_id), UNIQUE INDEX UNIQ_6AB5B471ABF410D0 (passport_id), UNIQUE INDEX UNIQ_6AB5B47146E90E27 (experience_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagny (id INT AUTO_INCREMENT NOT NULL, society_name VARCHAR(255) NOT NULL, activity_type VARCHAR(255) NOT NULL, contact_name VARCHAR(255) NOT NULL, position_held VARCHAR(255) NOT NULL, contact_number VARCHAR(255) NOT NULL, contact_email VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, duration VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, compagny_id INT NOT NULL, job_type_id INT NOT NULL, job_category_id INT NOT NULL, reference BIGINT NOT NULL, description VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL, job_title VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, salary INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', closing_date DATE NOT NULL, activated TINYINT(1) NOT NULL, INDEX IDX_A8936DC51224ABE0 (compagny_id), INDEX IDX_A8936DC55FA33B08 (job_type_id), INDEX IDX_A8936DC5712A86AB (job_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobtype (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F48704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471CFE419E2 FOREIGN KEY (cv_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471EFAE74C3 FOREIGN KEY (profil_pic_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471ABF410D0 FOREIGN KEY (passport_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B47146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC51224ABE0 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC55FA33B08 FOREIGN KEY (job_type_id) REFERENCES jobtype (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F48704627');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F6BF700BD');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F8D0EB82');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471708A0E0');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471CFE419E2');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471EFAE74C3');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471ABF410D0');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B47146E90E27');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC51224ABE0');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC55FA33B08');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('DROP TABLE apply');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE compagny');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE job_category');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE jobtype');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

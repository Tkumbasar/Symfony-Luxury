<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240309150437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apply ADD jobs_id INT NOT NULL, ADD status_id INT NOT NULL, ADD candidat_id INT NOT NULL, DROP candidat, DROP job_offer, DROP status');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F48704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F48704627 ON apply (jobs_id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F6BF700BD ON apply (status_id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F8D0EB82 ON apply (candidat_id)');
        $this->addSql('ALTER TABLE jobs ADD job_type_id INT NOT NULL, ADD job_category_id INT NOT NULL, DROP job_type, DROP job_category');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC55FA33B08 FOREIGN KEY (job_type_id) REFERENCES jobtype (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5712A86AB FOREIGN KEY (job_category_id) REFERENCES jobcategory (id)');
        $this->addSql('CREATE INDEX IDX_A8936DC55FA33B08 ON jobs (job_type_id)');
        $this->addSql('CREATE INDEX IDX_A8936DC5712A86AB ON jobs (job_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F48704627');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F6BF700BD');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F8D0EB82');
        $this->addSql('DROP INDEX IDX_BD2F8C1F48704627 ON apply');
        $this->addSql('DROP INDEX IDX_BD2F8C1F6BF700BD ON apply');
        $this->addSql('DROP INDEX IDX_BD2F8C1F8D0EB82 ON apply');
        $this->addSql('ALTER TABLE apply ADD candidat BIGINT NOT NULL, ADD job_offer BIGINT NOT NULL, ADD status BIGINT NOT NULL, DROP jobs_id, DROP status_id, DROP candidat_id');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC55FA33B08');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5712A86AB');
        $this->addSql('DROP INDEX IDX_A8936DC55FA33B08 ON jobs');
        $this->addSql('DROP INDEX IDX_A8936DC5712A86AB ON jobs');
        $this->addSql('ALTER TABLE jobs ADD job_type INT NOT NULL, ADD job_category INT NOT NULL, DROP job_type_id, DROP job_category_id');
    }
}

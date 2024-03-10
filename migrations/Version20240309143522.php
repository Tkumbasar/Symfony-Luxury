<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240309143522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs ADD compagny_id INT NOT NULL, DROP compagny');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC51224ABE0 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('CREATE INDEX IDX_A8936DC51224ABE0 ON jobs (compagny_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC51224ABE0');
        $this->addSql('DROP INDEX IDX_A8936DC51224ABE0 ON jobs');
        $this->addSql('ALTER TABLE jobs ADD compagny BIGINT NOT NULL, DROP compagny_id');
    }
}

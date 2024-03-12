<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311090256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat ADD gender_id INT NOT NULL, ADD profil_pic_id INT NOT NULL, DROP passport, DROP cv, DROP profil_pic');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471EFAE74C3 FOREIGN KEY (profil_pic_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B471708A0E0 ON candidat (gender_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471EFAE74C3 ON candidat (profil_pic_id)');
        $this->addSql('ALTER TABLE media ADD url_id INT NOT NULL, ADD name_id INT NOT NULL, DROP url, DROP name');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C81CFDAE7 FOREIGN KEY (url_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C71179CD6 FOREIGN KEY (name_id) REFERENCES candidat (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A2CA10C81CFDAE7 ON media (url_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6A2CA10C71179CD6 ON media (name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C81CFDAE7');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C71179CD6');
        $this->addSql('DROP INDEX UNIQ_6A2CA10C81CFDAE7 ON media');
        $this->addSql('DROP INDEX UNIQ_6A2CA10C71179CD6 ON media');
        $this->addSql('ALTER TABLE media ADD url VARCHAR(255) NOT NULL, ADD name VARCHAR(255) NOT NULL, DROP url_id, DROP name_id');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471708A0E0');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471EFAE74C3');
        $this->addSql('DROP INDEX IDX_6AB5B471708A0E0 ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471EFAE74C3 ON candidat');
        $this->addSql('ALTER TABLE candidat ADD passport INT NOT NULL, ADD cv INT NOT NULL, ADD profil_pic INT NOT NULL, DROP gender_id, DROP profil_pic_id');
    }
}

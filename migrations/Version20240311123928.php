<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311123928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B47146E90E27');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471EFAE74C3');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C71179CD6');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C81CFDAE7');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE media');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('DROP INDEX UNIQ_6AB5B471EFAE74C3 ON candidat');
        $this->addSql('DROP INDEX UNIQ_6AB5B471A76ED395 ON candidat');
        $this->addSql('DROP INDEX IDX_6AB5B47146E90E27 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP experience_id, DROP profil_pic_id, DROP user_id, DROP experience');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, duration VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, url_id INT NOT NULL, name_id INT NOT NULL, UNIQUE INDEX UNIQ_6A2CA10C81CFDAE7 (url_id), UNIQUE INDEX UNIQ_6A2CA10C71179CD6 (name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C71179CD6 FOREIGN KEY (name_id) REFERENCES candidat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C81CFDAE7 FOREIGN KEY (url_id) REFERENCES candidat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE candidat ADD experience_id INT NOT NULL, ADD profil_pic_id INT NOT NULL, ADD user_id INT NOT NULL, ADD experience INT NOT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B47146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471EFAE74C3 FOREIGN KEY (profil_pic_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471EFAE74C3 ON candidat (profil_pic_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471A76ED395 ON candidat (user_id)');
        $this->addSql('CREATE INDEX IDX_6AB5B47146E90E27 ON candidat (experience_id)');
    }
}

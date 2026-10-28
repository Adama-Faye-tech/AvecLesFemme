<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261024180057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mode_cotisation ADD is_libre BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE mode_cotisation ADD membre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mode_cotisation ADD campagne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mode_cotisation ADD CONSTRAINT FK_6BB9377E6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) NOT DEFERRABLE');
        $this->addSql('ALTER TABLE mode_cotisation ADD CONSTRAINT FK_6BB9377E16227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_6BB9377E6A99F74A ON mode_cotisation (membre_id)');
        $this->addSql('CREATE INDEX IDX_6BB9377E16227374 ON mode_cotisation (campagne_id)');
        $this->addSql('ALTER TABLE seance ADD date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE seance ADD montant_collecte NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE seance ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE seance ADD campagne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E16227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E16227374 ON seance (campagne_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mode_cotisation DROP CONSTRAINT FK_6BB9377E6A99F74A');
        $this->addSql('ALTER TABLE mode_cotisation DROP CONSTRAINT FK_6BB9377E16227374');
        $this->addSql('DROP INDEX IDX_6BB9377E6A99F74A');
        $this->addSql('DROP INDEX IDX_6BB9377E16227374');
        $this->addSql('ALTER TABLE mode_cotisation DROP is_libre');
        $this->addSql('ALTER TABLE mode_cotisation DROP membre_id');
        $this->addSql('ALTER TABLE mode_cotisation DROP campagne_id');
        $this->addSql('ALTER TABLE seance DROP CONSTRAINT FK_DF7DFD0E16227374');
        $this->addSql('DROP INDEX IDX_DF7DFD0E16227374');
        $this->addSql('ALTER TABLE seance DROP date');
        $this->addSql('ALTER TABLE seance DROP montant_collecte');
        $this->addSql('ALTER TABLE seance DROP created_at');
        $this->addSql('ALTER TABLE seance DROP campagne_id');
    }
}

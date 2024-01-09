<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109102737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teletravail_form ADD avis_manager TINYINT(1) DEFAULT NULL, ADD commentaire_manager VARCHAR(255) DEFAULT NULL, ADD avis_drh TINYINT(1) DEFAULT NULL, ADD commentaire_drh VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teletravail_form DROP avis_manager, DROP commentaire_manager, DROP avis_drh, DROP commentaire_drh');
    }
}

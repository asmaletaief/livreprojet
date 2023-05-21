<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520145926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP livrenom, DROP description_l, DROP quantite_l, DROP prix_livre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre ADD livrenom VARCHAR(255) NOT NULL, ADD description_l VARCHAR(255) DEFAULT NULL, ADD quantite_l INT NOT NULL, ADD prix_livre DOUBLE PRECISION NOT NULL');
    }
}

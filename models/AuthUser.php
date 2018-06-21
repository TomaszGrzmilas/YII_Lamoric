<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\BlameableBehavior;
use app\models\Comapny;

/**
 * This is the model class for table "{{%auth_user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $surname
 * @property int $company_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_by 
 * @property int $created_at
 * @property int $updated_by 
 * @property int $updated_at
 * @property string $password write-only password
 * @property Company[] $company
 */
class AuthUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return '{{%auth_user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['username', 'name', 'surname', 'auth_key', 'password_hash', 'email', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'required'],
            [['company_id', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['name', 'surname'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('db/authuser', 'ID'),
            'username' => Yii::t('db/authuser', 'Username'),
            'name' => Yii::t('db/authuser', 'Name'),
            'surname' => Yii::t('db/authuser', 'Surname'),
            'company_id' => Yii::t('db/authuser', 'Company ID'),
            'auth_key' => Yii::t('db/authuser', 'Auth Key'),
            'password_hash' => Yii::t('db/authuser', 'Password Hash'),
            'password_reset_token' => Yii::t('db/authuser', 'Password Reset Token'),
            'email' => Yii::t('db/authuser', 'Email'),
            'status' => Yii::t('db/authuser', 'Status'),
            'created_by' => Yii::t('db/authuser', 'Created By'),
            'created_at' => Yii::t('db/authuser', 'Created At'),
            'updated_by' => Yii::t('db/authuser', 'Updated By'),
            'updated_at' => Yii::t('db/authuser', 'Updated At'),
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

}

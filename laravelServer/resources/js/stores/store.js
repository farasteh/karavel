import Vue from 'vue';
import Vuex from 'vuex';
import Province from './Modules/Map/province.js'
import City from './Modules/Map/City.js'
import ActivityCompany from './Modules/Company/ActivityCompany.js'
import Company from './Modules/Company/Company.js'
import User from './Modules/User/User.js'
import AdvertisingSit from './Modules/Site/Advertising.js'
import Money from './Modules/Possibilities/Money.js'
import CooperationType from './Modules/Possibilities/CooperationType.js'
import HistoryJob from './Modules/Possibilities/HistoryJob.js'
import BaseRezome from './Modules/Member/Resume/BaseResume.js'
import Job from './Modules/Job/Jobs.js'
import CategoryJob from './Modules/Job/CategoryJob.js'
import WorkCategory from './Modules/Job/WorkCategory.js'
import Gender from './Modules/Gender/Gender.js'
import Soldier from './Modules/Soldier/Soldier.js'
import Document from './Modules/Study/Document.js'
import Institutes from './Modules/Study/Institute.js'
import RecordStudy from './Modules/Member/Resume/RecordStudy.js'
import CenterJob from './Modules/Job/CenterJobs.js'
import GroupLevels from './Modules/Job/GroupLevels.js'
import RecordJob from './Modules/Member/Resume/RecordJob.js'
import LangaugeResume from './Modules/Member/Resume/Langauge.js'
import Languge from './Modules/Languge/Languge.js'
import Experimental from './Modules/Member/Resume/Experimental.js'
import StepForm from './Modules/Member/Form/stepFrom.js'
import Certificates from './Modules/Certificates/Certificates.js'
import CertificatesResume from './Modules/Member/Resume/CertificatesResume.js'
import Honors from './Modules/Member/Resume/Honors.js'
import Effect from './Modules/Effect/Effect.js'
import ProjectResume from './Modules/Member/Resume/Project.js'
import ArticlesResume from './Modules/Member/Resume/Articles.js'
import SiteResume from './Modules/Site/Member/BaseResume.js'
import socailNetwork from './Modules/Possibilities/SocialNetwork.js'
import socialNetworkResume from './Modules/Member/Resume/socialNetworkResume.js'
import pdfThemes from './Modules/Member/Resume/pdf.js'
import Favorites from './Modules/Member/favorite/favorit'
import BehavioralSkills from './Modules/Advertising/behavioralSkill'
import CompanyBehavioralSkills from './Modules/Company/behavioralSkill'
import CompanyPosibility from './Modules/Company/Posibility'
import AdminActivityCompany from './Modules/Admin/ActivityCompany'
import resumeStatus from './Modules/Company/resumeStatus'
import Status from './Modules/Company/Status'
import CompanyAds from './Modules/Company/advertizing'
import MemberAds from './Modules/Member/Requests/advertizing'
import AdminCompany from './Modules/Admin/Company'
import AdminAdvertising from './Modules/Admin/Advertising'
import SiteCompany from './Modules/Site/Company/company'
import report from './Modules/User/report'
import reportAdmin from './Modules/Admin/user/report'
import Auth from './Modules/Auth/Auth'
import specialAdvertising from './Modules/Advertising/specialAdvertising'
import Routes from './Modules/Login/routers'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        Province                : Province,
        City                    : City,
        ActivityCompany         : ActivityCompany,
        Company                 : Company,
        User                    : User,
        AdvertisingSit          : AdvertisingSit,
        Money                   : Money,
        CooperationType         : CooperationType,
        HistoryJob              : HistoryJob,
        BaseRezome              : BaseRezome,
        Job                     : Job,
        CategoryJob             : CategoryJob,
        WorkCategory            : WorkCategory,
        Gender                  : Gender,
        Soldier                 : Soldier,
        Document                : Document,
        Institutes              : Institutes,
        RecordStudy             : RecordStudy,
        CenterJob               : CenterJob,
        GroupLevels             : GroupLevels,
        RecordJob               : RecordJob,
        Languge                 : Languge,
        LangaugeResume          : LangaugeResume,
        Experimental            : Experimental,
        StepForm                : StepForm,
        Certificates            : Certificates,
        CertificatesResume      : CertificatesResume,
        Honors                  : Honors,
        Effect                  : Effect,
        ProjectResume           : ProjectResume,
        ArticlesResume          : ArticlesResume ,
        SiteResume              : SiteResume ,
        socailNetwork           : socailNetwork ,
        socialNetworkResume     : socialNetworkResume ,
        Favorites               : Favorites ,
        pdfThemes               : pdfThemes ,
        BehavioralSkills        : BehavioralSkills ,
        CompanyBehavioralSkills : CompanyBehavioralSkills ,
        CompanyPosibility       : CompanyPosibility ,
        AdminActivityCompany    : AdminActivityCompany ,
        resumeStatus            : resumeStatus ,
        Status                  : Status ,
        CompanyAds              : CompanyAds ,
        MemberAds               : MemberAds ,
        AdminCompany            : AdminCompany ,
        AdminAdvertising        : AdminAdvertising ,
        SiteCompany             : SiteCompany,
        report                  : report,
        reportAdmin             : reportAdmin,
        Auth                    : Auth,
        specialAdvertising      : specialAdvertising,
        Routes                  : Routes
    }

});

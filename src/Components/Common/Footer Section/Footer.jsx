import React from 'react'
import classes from './Footer.module.css'
import Logo from '../../../assets/Logo.png'
import socials from '../../../assets/socials.png'

const Footer = () => {
  return (
    <div className={classes.footer}>
    <div className={classes.footer_con}>
        <div className={classes.topcontent}>
            <div className={classes.logo_con}>
                <img src={Logo} alt='' />
            </div>
            <div className={classes.routing}>
                <div className={classes.options}>
                    <h2>Services</h2>
                    <h2>Portfolio</h2>
                    <h2>About us</h2>
                    <h2>Careers</h2>
                </div>
                <div className={classes.location}>
                    <div className={classes.title}>
                        <h4>Nested Stacks</h4>
                        <p>Nested Stacks Holding</p>
                    </div>
                    <div className={classes.loc}><p>Tayouneh Chiyah, Beirut Lebanon</p></div>
                </div>
                <div className={classes.contact}>
                        <h4>Contact</h4>
                        <p>+961 70 916987</p>
                        <p>info@nestedstacks.com</p>
                        <img src={socials} alt='' />
                    </div>
            </div>
        </div>
        </div>
        <div className={classes.bottom}>
            <div className={classes.bottomcontent}>
                <div className={classes.terms}>
                <p>Privacy Policy</p>
                <p>Terms of Use</p>
                </div>
                <div className={classes.copyright}>
                    <p>&copy; 2021 Nested Stacks. All rights reserved.</p>
                </div>
                <div className={classes.back}>
                    <p>Back to Top</p>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Footer